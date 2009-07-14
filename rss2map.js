function rss2map(o){
  if(o.length > 0){
    var geopoints = [];
    var map = new YMap(document.getElementById('rss2map')); 

    var Pin = new YImage();
    Pin.src = 'http://pidgets.com/red_pin.png';
    Pin.size = new YSize(32,27);
    Pin.offset = new YCoordPoint(1,4);
    // ^^ replace with your own image

    map.addZoomLong();
    map.addPanControl();

    for(var i=0;i<o.length;i++){
      var point = new YGeoPoint(o[i].lat,o[i].lon);
      geopoints.push(point);
      var newMarker = new YMarker(point,Pin);
      newMarker.addAutoExpand(o[i].title + ' (click for more)');
      newMarker.content = o[i].content;
      YEvent.Capture(newMarker, EventsList.MouseClick, function(){
         this.openSmartWindow(this.content);
      });
      map.addOverlay(newMarker);
    }

    var zac = map.getBestZoomAndCenter(geopoints);        
    map.drawZoomAndCenter(zac.YGeoPoint,zac.zoomLevel);
  }
}
