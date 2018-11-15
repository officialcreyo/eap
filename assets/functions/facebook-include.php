<?php
try {
    $str = 'https://graph.facebook.com/v3.0/me?fields=fan_count&new_like_count&access_token=EAACEdEose0cBACxU5LDMk7w3nAlkyxVV5LLp6Me0wpZCZCk2ZAgz0T0VWiWk7A5z7xiHZBZB8ZAhZCZBhZCnHmuTb3XQsZCnKuz1oaT6zrHJLS3HxlFDnVyM6aOxY4ufdkoBTjWrinZA8zyZBFqmntjVyJNeIQ2wgF4x77CduUDfTSmncWnQZAXn6F6MZAZAAUhsZBlx4ZC2n7dZCz8D159wZDZD';
    $a = file_get_contents($str);
    } catch(Exception $e)
    {
        echo 'error: '.$e->getMessage();
    }

$data = json_decode($a);
$facebooklikes = $data->fan_count;
$facebooknewlikes = $data->new_like_count;
?>