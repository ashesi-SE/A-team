// <script >
function cleanUp(){
	//alert("hgjffytfgbfvghhfghf");
	$('#firstname').val("");
// 	$ (#lastName.val("") );
// 	$(#telephone.val("") );
// 	$ (#email.val("") );
}

function showModal(){
	
}
// </script>


$(document).ready(function() {
	// your code here...
	$("#btn").click(function(){
		cleanUp();
	});

	$("#myBtn").click(function() {
		 showModal();
	}
		);
});