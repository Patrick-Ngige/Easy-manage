<?php
/**
 * Template Name: Searched Results
 */

get_header();
?>

<h1>Search Results</h1>

<?php
$search_query = isset($_GET['name']) ? sanitize_text_field($_GET['name']) : '';

// Make a request to the custom endpoint with the search query
$response = wp_remote_get('http://localhost/easy-manage/wp-json/em/v1/users/search?name=' . urlencode($search_query));

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $results = wp_remote_retrieve_body($response);

    // Process and display the search results here
    echo $results;
} else {
    echo '<p>No results found.</p>';
}
?>

<?php get_footer(); ?>
