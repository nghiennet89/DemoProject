<body>
<div class="input-form">
    <form action="/" method="POST">
        <div class="input-row">
            <div class="input-label">Please enter time:</div>
            <input class="input-el" name="time" value="<?php echo isset($inputTime) ? $inputTime : '' ?>" type="time" required min="00:00" max="23:59">
        </div>
        <div class="input-row">
            <div class="input-label">Please enter genre:</div>
            <input class="input-el" name="genre" value="<?php echo isset($inputGenre) ? $inputGenre : '' ?>" type="text" required>
        </div>
        <input class="input-submit-btn" type="submit" value="submit"/>
    </form>
</div>
<?php
if (isset($possibleMovies)) {
    ?>
    <div class="result-form">
        <div>Result:</div>
        <?php if (count($possibleMovies) < 1) echo '<div class="result-empty">No result found</div>' ?>
        <div class="result-list">
            <?php
            foreach ($possibleMovies as $possibleMovie) {
                echo '<div class="result-item"><span class="movie-name">' . $possibleMovie->name . '</span> showing at <span class="movie-time">' . $possibleMovie->matchedShowingTime . '</span></div>';
            }
            ?>
        </div>
    </div>
    <?php
}
?>
<style>

    .input-form, .result-form {
        width: 100%;
        padding: 1rem;
    }

    .input-row {
        padding-bottom: 1rem;
    }

    .input-label {
        width: 150px;
    }

    .input-el {
        width: 200px;
    }

    .result-item {
        padding-top: 1rem;
    }

    .movie-name, .movie-time {
        font-weight: bold;
    }

    .movie-time {
        color: darkred;
    }
</style>
</body>
