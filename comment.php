

<form action="http://localhost:8888/comment" method="post" id="commentform">




		<div class="form-item">
			<h4>Name</h4>
			<input type="text" name="name" />
		</div>
		
		<div class="form-item">
			<h4>Email</h4>
			<input type="text" name="email" />
		</div>


		<div class="form-item">
			<h4>Comment</h4>
			<textarea name="comment"></textarea>
		</div>
		
		<div class="form-item">
			<h4>Rating</h4>
			<select name="rating">
				<option value="0"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				
			</select>
				
		</div>
	
		<button type="submit" class="btn">Submit</button>
	</form>
