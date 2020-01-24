<?php
session_start();
// ovde flash massage function flash()
/**
 * Check if user logged in
 * @return bool
 */
function isLoggedIn() : bool
{
    if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
}

/**
 * Unset all session and logOut user
 */
function logOut(): void
{
    unset($_SESSION['id']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    session_destroy();
}