<?php

function activate_menu($pageUrl) {
    helper('url');
    return url_is($pageUrl) ? 'active' : '';
}
