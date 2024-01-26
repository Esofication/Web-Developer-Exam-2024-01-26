function updateImage() {
    const targetColor = document.getElementById('targetColor').value;
    const imageSrc = targetColor ? `Images/${targetColor}.jpg` : 'Images/AutoPaintExam.jpg';
    document.getElementById('carImage').src = imageSrc;
    console.log('Target Color:', targetColor);
}
document.getElementById('targetColor').addEventListener('change', updateImage);


$(document).ready(function() {
    $(".complete-action").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "update_status.php",
            method: "POST",
            data: { id: id },
            success: function(response) {
                if (response == "success") {
                    $(this).text("Complete");
                    $(this).removeClass("complete-action");
                } else {
                    alert("Failed to update status.");
                }
            }
        });
    });
});

