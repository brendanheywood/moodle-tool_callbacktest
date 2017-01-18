<?php

function tool_callbacktest_before_http_headers() {
    // eg an admin tool could manage CSP headers
    header("Foo: Bar");
}

function tool_callbacktest_add_htmlattributes() {
    // eg add some extra metadata namespaces which are used elsewhere.
    return array(
        'xmlns:og' => 'http://ogp.me/ns#', # this should be in the page
        'escape'   => "some bad chars ' = & < > '", # this should be in the page
        'lang'     => 'wrong', # don't allow this to be added
        'dir'      => 'up',    # don't allow this to be added
        'xml:lang' => 'wrong', # don't allow this to be added
    );
}

function tool_callbacktest_before_standard_html_head() {
    // eg metadata about the page we are on for open grp
    return "<meta name='foo' value='before_top_of_body_html' />\n";
}

function tool_callbacktest_before_standard_top_of_body_html() {
    // Eg inject some content like a fixed header.
    return "<div style='background: red'>Before standard top of body html</div>";
}

function tool_callbacktest_before_footer() {
    global $PAGE;

    // eg the user tours could use this hook
    $PAGE->requires->js_init_code("alert('before_footer');");
}

