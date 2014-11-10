   $(window).load(function() {
        $('.flexslider').flexslider({
            after: function(slider) {
                //adjustBgColor();
                blurImgEdges();
            },
            start: function(slider) {
                //adjustBgColor();
                blurImgEdges();
            }
        });
        blurImgEdges();
      });
    function blurImgEdges() {
        $flexActiveSlide = $('.flex-active-slide');
        $img = $flexActiveSlide.find('img');
        var imgPosition = $img.position();
        $blurBox = $('<div/>');
        $blurBox.attr('class', 'blurbox');
        var overlap = 0;
        var blurBoxTop = $img.position().top + overlap;
        var blurBoxLeft = $img.position().left + overlap;
        var blurBoxWidth = $img.width() - overlap*2;
        var blurBoxHeight = $img.height() - overlap*2;
        var imgBgColor = findImgBgColor();
        var rgba = 'rgba('
                        + imgBgColor[0] + ','
                        + imgBgColor[1] + ','
                        + imgBgColor[2] + ','
                        + '1'
                    + ')';
                                                                                                                           37,9          12%
 console.log(rgba);
        $blurBox.css({
            position: 'absolute',
            top: blurBoxTop + 'px',
            left: blurBoxLeft + 'px', 
            width: blurBoxWidth + 'px',
            height: blurBoxHeight + 'px',
            boxShadow: '0 0 20px 5px ' + rgba
        });
        $('.blurbox').remove();
        $img.parent().append($blurBox);
    }
    function adjustBgColor() {
        // make background color the same as photos bg color
        console.log('slide changed');
        imgBgColor = findImgBgColor();
        $flexslider = $('.flexslider');
        console.log('color: ' + imgBgColor);
        $flexslider.css({'background-color': imgBgColor});

    }
    function findImgBgColor() {
        $flexActiveSlide = $('.flex-active-slide');
        $img = $flexActiveSlide.find('img');
        return getPixelColor($img[0], 10, 10);
    }

    function getPixelColor(img, x, y) {
        var canvas = $('<canvas/>')[0];
        canvas.width = img.width;
        canvas.height = img.height;
        canvas.getContext('2d').drawImage(img, 0, 0, img.width, img.height);

        var pixelData = canvas.getContext('2d').getImageData(x, y, 1, 1).data;
        var color = 'rgb('
                        + pixelData[0] + ','
                        + pixelData[1] + ','
                        + pixelData[2]
                    + ')';
        return pixelData; 
    }
