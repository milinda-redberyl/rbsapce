<?php if (!empty($suggestedCategoryList)) {
    $currentURL = current_url();
    $params = $_SERVER['QUERY_STRING'];


    //var_dump($suggestedCategoryList);
    echo '<div class="ppt-search-count milee2">';
    foreach ($suggestedCategoryList as $category) {
        echo '<div class="col-md-4 col-sm-6 col-xs-12 styleWhite">';
        $count = category_count($category['property_type_id']);
        if ($count > 0) {
            echo '<a href="' . $currentURL . '?' . $params . '&pt=' . $category['property_type_id'] . '">' . $category['property_type_name'] . ' (' . $count . ')</a>';
        }
        echo '</div>';
    }
    echo '</div>';
}
