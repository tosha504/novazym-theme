<?php

/**
 * TNL Table Render Callback
 *
 * @package  bht-tnl
 */
defined('ABSPATH') || exit;
function tnl_table_render_callback($title = null, $content = null, $rows)
{
?>
  <!-- tnl-table end -->
  <section class="tnl-table">
    <div class="container">
      <?php echo $title;
      echo $content; ?>
      <div id="acf-wrapper">
        <div class="acf-table-grid">
          <div class="acf-cell">Typ nowotworu</div>
          <div class="acf-cell">Liczba genów</div>
          <div class="acf-cell">Przykładowe geny (m.in.)
            <div class="pagination-buttons" id="pagination-controls">
              <button id="prevBtn"></button>
              <button id="nextBtn"></button>
            </div>
          </div>

        </div>
        <div class="acf-table-grid" id="acf-grid">
        </div>

      </div>
    </div>
  </section><!-- tnl-table end -->
  <script>
    jQuery(document).ready(function($) {
      const allRows = <?php echo json_encode($rows); ?>;
      const rowsPerPage = 10;
      let currentPage = 0;

      function renderGrid() {
        const $grid = $('#acf-grid');
        $grid.empty();

        const start = currentPage * rowsPerPage;
        const end = start + rowsPerPage;
        const pageRows = allRows.slice(start, end);

        $.each(pageRows, function(index, row) {
          console.log(index);

          $grid.append(`<div class="acf-cell">${row.type_cancer}</div>`);
          $grid.append(`<div class="acf-cell">${row.gene_count}</div>`);
          $grid.append(`<div class="acf-cell">${row.Example_genes}</div>`);
        });

        // Disable/enable buttons
        $('#prevBtn').prop('disabled', currentPage === 0);
        $('#nextBtn').prop('disabled', (currentPage + 1) * rowsPerPage >= allRows.length);

        // Show or hide pagination
        $('#pagination-controls').css('display', allRows.length > rowsPerPage ? 'flex' : 'none');
      }

      $('#prevBtn').on('click', function() {
        if (currentPage > 0) {
          currentPage--;
          renderGrid();
        }
      });

      $('#nextBtn').on('click', function() {
        if ((currentPage + 1) * rowsPerPage < allRows.length) {
          currentPage++;
          renderGrid();
        }
      });

      // Initial render
      renderGrid();
    });
  </script>
<?php
}
