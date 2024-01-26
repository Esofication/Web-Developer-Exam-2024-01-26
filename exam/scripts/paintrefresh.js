function updatePaintTables() {
    $.ajax({
        url: 'php/update_paint_tables.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('Paint tables updated successfully:', data);
            $('#paintJobsTableWithAction').html(data.paintJobsTableHTML);
            $('#paintJobsTableWithoutAction').html(data.paintQueueTableHTML);
        },
        error: function(xhr, status, error) {
            console.error('Error updating paint tables:', error);
        }
    });
}

function updateShopPerformance() {
    $.ajax({
        url: 'php/update_shop_performance.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('Shop performance updated successfully:', data);
            $('#shopPerformanceContainer').html(data.shopPerformanceHTML);
        },
        error: function(xhr, status, error) {
            console.error('Error updating shop performance:', error);
        }
    });
}

setInterval(function() {
    console.log('Updating paint tables and shop performance...');
    updatePaintTables();
    updateShopPerformance();
}, 5000);
