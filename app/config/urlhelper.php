<?php
/**
 * Shorter function for redirect
 * @param string $page 
 */
function redirect(string $page): void
{
    header('Location: ' . URLROOT . '/' . $page);
}
