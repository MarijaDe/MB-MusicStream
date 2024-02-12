// public/js/load-more.js
$(document).ready(function() {
    var offset = 10; // Initial offset, adjust based on the number of albums loaded initially

    $('.load-more-btn a').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/load-more-albums/' + offset,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.albums.length > 0) {
                    // Append new albums to the existing container
                    response.albums.forEach(function(album) {
                        var albumHtml = '<div class="col-12 col-sm-6 col-md-4 col-lg-2">' +
                            '<div class="single-album-area wow fadeInUp" data-wow-delay="100ms">' +
                            '<div class="album-thumb">' +
                            '<img src="' + album.image + '" alt="' + album.title + '">' +
                            '<div class="play-icon">' +
                            '<a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>' +
                            '</div>' +
                            '</div>' +
                            '<div class="album-info">' +
                            '<a href="#">' +
                            '<h5>' + album.title + '</h5>' +
                            '</a>' +
                            '<p>' + album.artist.name + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('.oneMusic-buy-now-area .row').append(albumHtml);
                    });

                    offset += 10; // Increment the offset for the next load
                } else {
                    // No more albums to load
                    $('.load-more-btn').hide();
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
});
