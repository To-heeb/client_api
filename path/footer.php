<footer class="row">
			<div class="col-12">
				<h1>Footer</h1>
			</div>
		</footer>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			$('#signUpForm').hide()
			$('#signUpLink').click(function(){
				$('#logInForm').fadeOut(1800)
				$('#signUpForm').slideDown(2500)
			})
			$("#logInLink").click(function(){
				$('#signUpForm').fadeOut(1800)
				$('#logInForm').slideDown(2500)
			})
		})
	</script>
</body>
</html>