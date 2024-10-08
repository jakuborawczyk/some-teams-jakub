<?php require __DIR__ ."/navbar.php";
require __DIR__ ."/data.php";

// Sort the teams by UEFA Coefficient Ranking and preserve the team names as keys
uasort($teams, function($a, $b) {
    if ($a['uefa-coefficient-ranking'] === 'Not ranked') return 1;
    if ($b['uefa-coefficient-ranking'] === 'Not ranked') return -1;
    return $a['uefa-coefficient-ranking'] - $b['uefa-coefficient-ranking'];
});

// Assign UEFA ranking based on sorted order
$rank = 1;
foreach ($teams as $teamName => $teamData) {
    if ($teamData['uefa-coefficient-ranking'] !== 'Not ranked') {
        $teams[$teamName]['uefa-ranking'] = $rank++;
    } else {
        $teams[$teamName]['uefa-ranking'] = 'Not ranked';
    }
}
?>

    <!-- Teams Section -->
    <section class="teams-section">
        <h1>Football Teams Ranked by UEFA</h1>

        <div class="card-container">
            <?php foreach ($teams as $teamName => $teamData): ?>
                <div class="team-card">
                    <img src="<?= htmlspecialchars($teamData['logo']); ?>" alt="<?= htmlspecialchars($teamName); ?> Logo" class="team-logo">
                    <h2><?= htmlspecialchars($teamName); ?></h2> <!-- Fix for team name output -->
                    <p><strong>UEFA Rank:</strong> <?= htmlspecialchars($teamData['uefa-ranking']); ?></p>
                    <p><strong>League:</strong> <?= htmlspecialchars($teamData['league']); ?></p>
                    <p><strong>City:</strong> <?= htmlspecialchars($teamData['city']); ?></p>
                    <p><strong>Group:</strong> <?= htmlspecialchars($teamData['group']); ?></p>
                    <p><strong>UEFA Coefficient Ranking:</strong> <?= htmlspecialchars($teamData['uefa-coefficient-ranking']); ?></p>
                    <a href="<?= htmlspecialchars($teamData['url']); ?>" target="_blank" class="team-link">Visit Club Website</a>
                </div>
            <?php endforeach;?>
        </div>
    </section>

<?php require __DIR__ ."/footer.php" ?>