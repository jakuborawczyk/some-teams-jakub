<?php require __DIR__ ."/navbar.php";
require __DIR__ ."/data.php";
usort($teams, function($a, $b) {
    // If team isnt ranked push them to the bottom
    if ($a['uefa-coefficient-ranking'] === 'Not ranked') return 1;
    if ($b['uefa-coefficient-ranking'] === 'Not ranked') return -1;

    // Sort by descending order
    return $b['uefa-coefficient-ranking'] - $a['uefa-coefficient-ranking'];
});
?>

<?php require __DIR__ ."/footer.php" ?>