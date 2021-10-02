




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="assets/node_modules/jcrop/dist/jcrop.js"></script> -->
<script src="//code.jquery.com/jquery.min.js"></script>

<script src="assets/Jcrop/js/jquery.Jcrop.min.js" ></script>


<script type="text/javascript">

                $(document).ready(function(){
                    $('#add_section').click(function(){
                        $('#cropbox').Jcrop({
                            aspectRatio:1,
                            onSelect:updateCoords,
                            onChange:updateCoords
                        });
                        
                    });
                });

                function updateCoords(c)
                {
                    
                    showPreview(c);
                    $('#x').val(c.x);
                    $('#y').val(c.y);
                    $('#h').val(c.h);
                    $('#w').val(c.w);
                }

                function showPreview(coords){
                    var rx = 100 / coords.w;
	                var ry = 100 / coords.h;

	                $('#preview img').css({
		                width: Math.round(rx * 500) + 'px',
		                height: Math.round(ry * 600) + 'px',
		                marginLeft: '-' + Math.round(rx * coords.x) + 'px',
		                marginTop: '-' + Math.round(ry * coords.y) + 'px'
	                });
                }
    </script>
</body>
</html>