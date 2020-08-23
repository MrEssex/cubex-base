<?php


namespace FusionBase\Application\Layout;


use Cubex\Controller\Controller;
use Cubex\I18n\GetTranslatorTrait;
use Packaged\Context\Context;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Http\Response;
use Packaged\I18n\TranslatableTrait;
use Packaged\Ui\Element;
use Packaged\Ui\Html\HtmlElement;

use function is_array;
use function is_scalar;

/**
 * Class AbstractController
 * @package FusionBase\Application\Controller
 * @method \FusionBase\Application\Context\Context getContext() : Context
 */
abstract class LayoutController extends Controller
{

  use GetTranslatorTrait;
  use TranslatableTrait;

  protected function _generateRoutes()
  {
    return '';
  }

  /**
   * @param Context $c
   * @param mixed $result
   * @param null $buffer
   * @return mixed|Response
   */
  protected function _prepareResponse(Context $c, $result, $buffer = null)
  {
    if (
    ($result instanceof Element || $result instanceof HtmlElement || $result instanceof HtmlTag || is_scalar(
        $result
      ) || is_array($result))) {
      $theme = new Layout();
      $theme->setContext($this->getContext())->setContent($result);
      return parent::_prepareResponse($c, $theme, $buffer);
    }

    return parent::_prepareResponse($c, $result, $buffer);
  }

}