<?php

/*
 * Conditional load relationship based on request parameter
 * Eg : test.dev/api/v1/pages?include=user,category
 * */

function load($attach)
{
    return app('load')->attach($attach);
}