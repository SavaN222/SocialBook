<?php
/**
 * Shorter function for redirect
 * @param string $page 
 */
function redirect($page)
{
    header('Location: ' . URLROOT . '/' . $page);
}
