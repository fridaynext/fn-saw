// External Dependencies
import $ from 'jquery';

// Internal Dependencies
import modules from './modules';
import './default.css';
import './header.css';
import './vendor-profile.css';
import './vendor-style.css';
import './scripts';

$(window).on('et_builder_api_ready', (event, API) => {
  API.registerModules(modules);
});
