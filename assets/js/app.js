/**
|--------------------------------------------------
| App State
|--------------------------------------------------
*/
var appState = {
  settings: {
    app: document.getElementById('app')
  },
  INIT: function() {
    var appState = this;
  }
}

/**
|--------------------------------------------------
| App Header
|--------------------------------------------------
*/
var appHeader = {
  elem: $('.app-header'),
  INIT: function() {
    var appHeader = this;
    $(window).on('load resize scroll', function () {
      var wpadminbar = ( $('#wpadminbar').length == 1 ? $('#wpadminbar').outerHeight() : 0 );
      var offsetTop = wpadminbar + appHeader.elem.outerHeight();

      if ( $(window).scrollTop() > offsetTop ) { 
        appHeader.elem.addClass('app-header--shrink')
      }
      else {
        appHeader.elem.removeClass('app-header--shrink')
      }
    });
  }
}

/**
|--------------------------------------------------
| App Header Navigation
|--------------------------------------------------
*/
var appHeaderNavigation = {
  settings: {
    toggleMenuButton: $('.app-header__menu-toggle')
  },
  INIT: function() {
    var appHeaderNavigation = this;

    appHeaderNavigation.settings.toggleMenuButton.on('click', function() {
      $(this).toggleClass('open');
    });
  }
}

$(document).ready(function() {
  appState.INIT();
  appHeader.INIT();
  appHeaderNavigation.INIT();
});
