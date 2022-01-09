<?php
//Based on https://github.com/jchue/argon-webtrees-theme

namespace EvanG\Themes\DarkTheme;

use Fisharebest\Webtrees\Webtrees;
use Fisharebest\Webtrees\Module\MinimalTheme;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\View;

//Import the Light Module
require_once Webtrees::ROOT_DIR . Webtrees::MODULES_PATH . "light/LightModule.php";
use EvanG\Themes\LightTheme\LightTheme;

use Fisharebest\Webtrees\FlashMessages;
if (!class_exists("EvanG\Themes\LightTheme\LightTheme", true)) {
  FlashMessages::addMessage("Missing dependency: Light Theme");
  return;
}

class DarkTheme extends LightTheme implements ModuleCustomInterface {
    use ModuleCustomTrait;

    /**
     * @return string
     */
    public function title(): string { return 'Dark'; }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

    /**
     * Add our own stylesheet to the existing stylesheets.
     *
     * @return array
     */
    public function stylesheets(): array
    {
        $stylesheets = parent::stylesheets();
        $stylesheets[] = $this->assetUrl('dark.css');
        return $stylesheets;
    }
}

return new DarkTheme();
