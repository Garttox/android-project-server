<?php
// source: D:\stranky\www\android-project-server\app\presenters\templates\components\bootstrap-point-form.latte

use Latte\Runtime as LR;

class Template75f3b8e1c4 extends Latte\Runtime\Template
{
	public $blocks = [
		'bootstrap-head' => 'blockBootstrap_head',
		'bootstrap-point-form' => 'blockBootstrap_point_form',
	];

	public $blockTypes = [
		'bootstrap-head' => 'html',
		'bootstrap-point-form' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['error'])) trigger_error('Variable $error overwritten in foreach on line 9');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockBootstrap_head($_args)
	{
?><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous"> 
<?php
	}


	function blockBootstrap_point_form($_args)
	{
		extract($this->params);
		list($form) = $_args + [NULL, ];
?>
<div class="container">
<?php
		$form = $_form = $this->global->formsStack[] = is_object($form) ? $form : $this->global->uiControl[$form];
		?>	<form class="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), false) ?>>
<?php
		if ($form->hasErrors()) {
?>		<div class="errors text-center bg-warning col-md-4 offset-md-4">
<?php
			$iterations = 0;
			foreach ($form->errors as $error) {
?>			<div>
				<?php echo LR\Filters::escapeHtmlText($error) /* line 10 */ ?>

			</div>
<?php
				$iterations++;
			}
?>
		</div>
<?php
		}
?>
		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["name"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-5 col-form-label"]);
		echo end($this->global->formsStack)["name"]->getControl()->addAttributes(['class' => "form-control offset-md-1 col-md-10"]) /* line 14 */ ?>

		</div>

		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["longitude"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-3 col-form-label"]);
		if ($_label = end($this->global->formsStack)["latitude"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-2 col-form-label"]) ?>

			<?php
		echo end($this->global->formsStack)["longitude"]->getControl()->addAttributes(['class' => "form-control col-md-5 offset-md-1"]) /* line 19 */;
		echo end($this->global->formsStack)["latitude"]->getControl()->addAttributes(['class' => "form-control col-md-5"]) /* line 19 */ ?>

			<div class="offset-md-1 col-md-10 map">
				<div class="iframe-container" id="map"></div>
			</div>
			

		</div>

		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["text"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-5 col-form-label"]);
		echo end($this->global->formsStack)["text"]->getControl()->addAttributes(['class' => "form-control offset-md-1 col-md-10"]) /* line 28 */ ?>

		</div>
		<div class="form-group row">
			<?php if ($_label = end($this->global->formsStack)["fotoURL"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-5 col-form-label"]) ?>

			<?php echo end($this->global->formsStack)["fotoURL"]->getControl()->addAttributes(['class' => "offset-md-1 col-md-10"]) /* line 32 */ ?>

		</div>
		<div class="form-group row">
			<?php echo end($this->global->formsStack)["submit"]->getControl()->addAttributes(['class' => "btn btn-primary offset-md-5 col-md-2"]) /* line 35 */ ?>

		</div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>	</form>
</div>
        <script type="text/javascript">
        var map;
        var markers = [];
        var marker;

        function initMap() {      
            var latitude = 49.938875; // YOUR LATITUDE VALUE
            var longitude = 17.902430; // YOUR LONGITUDE VALUE
            
            var myLatLng = { lat: latitude, lng: longitude };
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 16,
              disableDoubleClickZoom: true, // disable the default map zoom on double click
            });
            
            // Update lat/long value of div when anywhere in the map is clicked    
            google.maps.event.addListener(map,'click',function(event) {                
                document.getElementById('frm-pointForm-latitude').value = event.latLng.lat();
                document.getElementById('frm-pointForm-longitude').value =  event.latLng.lng();
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });
                markers.push(marker);
                setMapOnAll(map);
            }); 

			if(document.getElementById('frm-pointForm-latitude').value != "" && document.getElementById('frm-pointForm-longitude').value != ""){
				var lat=parseFloat(document.getElementById('frm-pointForm-latitude').value);
				var lng=parseFloat(document.getElementById('frm-pointForm-longitude').value);
				marker = new google.maps.Marker({
					position: { lat : lat, lng: lng },
					map: map,
					title: lat+', '+lng
				});
				markers.push(marker);
			}
			

        }

		function setMarker(){
			if(document.getElementById('frm-pointForm-latitude').value != "" && document.getElementById('frm-pointForm-longitude').value != ""){
				var lat=parseFloat(document.getElementById('frm-pointForm-latitude').value);
				var lng=parseFloat(document.getElementById('frm-pointForm-longitude').value);
				markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
				marker = new google.maps.Marker({
					position: { lat : lat, lng: lng },
					map: map,
					title: lat+', '+lng
				});
				markers.push(marker);
			}
		}

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcPVxWn2Izh5rGaJKt1ooP-WffiST-jbo&callback=initMap"
    async defer></script>
<?php
	}

}
