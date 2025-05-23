
<?php if ($hasNextPage || $hasPrevPage) { ?>
    <div class="row justify-content-end p-2 gx-2 my-2 aling-items-center">
        <div class="col-auto">
            <!-- Disable previous button if the page is greater than 1 -->
            <a href="index.php?page=<?= $page - 1  ?>" 
                class="btn btn-sm btn-outline-primary <?php if (!$hasPrevPage) { echo "disabled"; } ?>"
                <?php if (!$hasPrevPage) { echo "role='button' aria-disabled='true'"; } ?>>
                <i class="fa-solid fa-angles-left"></i>
                Previous
            </a>
        </div>
        <div class="col-auto">
            <!-- Disable next button if there are more items -->
            <a href="index.php?page=<?= $page + 1 ?>" 
                class="btn btn-sm btn-outline-primary <?php if (!$hasNextPage) { echo "disabled"; } ?>"
                <?php if (!$hasNextPage) { echo "role='button' aria-disabled='true'"; } ?>>
                Next
                <i class="fa-solid fa-angles-right"></i>
            </a>
        </div>
    </div>
<?php } ?>