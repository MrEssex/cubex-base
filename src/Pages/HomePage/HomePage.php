<?php

namespace CubexBase\Application\Pages\HomePage;

use CubexBase\Application\Components\FeatherIcons\FeatherIcon;
use CubexBase\Application\Components\FeatherIcons\FeatherIcons;
use CubexBase\Application\Pages\AbstractPage;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Text\Paragraph;
use Throwable;

/**
 * Class HomePage
 * @package CubexBase\Application\Pages\HomePage
 */
class HomePage extends AbstractPage
{

  /**
   * @return string
   */
  public function getBlockName(): string
  {
    return 'homepage';
  }

  /**
   * @return HtmlTag|Div|array
   * @throws Throwable
   */
  protected function _getContentForRender()
  {
    return [
      Div::create($this->_('hello_world_b10a', 'Hello World')),
      LineBreak::create(),
      Paragraph::create(
        FeatherIcon::withContext($this, FeatherIcons::ACTIVITY()),
        'This is something'
      ),
    ];
  }
}