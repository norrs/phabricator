<?php

final class PhabricatorApplicationCountdown extends PhabricatorApplication {

  public function getBaseURI() {
    return '/countdown/';
  }

  public function getIconName() {
    return 'countdown';
  }

  public function getShortDescription() {
    return pht('Countdown Timers');
  }

  public function getTitleGlyph() {
    return "\xE2\x9A\xB2";
  }

  public function getFlavorText() {
    return pht('Utilize the full capabilities of your ALU.');
  }

  public function getApplicationGroup() {
    return self::GROUP_UTILITIES;
  }

  public function getRemarkupRules() {
    return array(
      new PhabricatorCountdownRemarkupRule(),
    );
  }

  public function getRoutes() {
    return array(
      '/countdown/' => array(
        '(?:query/(?P<queryKey>[^/]+)/)?'
          => 'PhabricatorCountdownListController',
        '(?P<id>[1-9]\d*)/'
          => 'PhabricatorCountdownViewController',
        'edit/(?:(?P<id>[1-9]\d*)/)?'
          => 'PhabricatorCountdownEditController',
        'delete/(?P<id>[1-9]\d*)/'
          => 'PhabricatorCountdownDeleteController'
      ),
    );
  }

  public function getCustomCapabilities() {
    return array(
      PhabricatorCountdownCapabilityDefaultView::CAPABILITY => array(
        'caption' => pht('Default view policy for new countdowns.'),
      ),
    );
  }

}
