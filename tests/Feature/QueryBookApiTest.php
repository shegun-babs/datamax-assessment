<?php

it('it sees external-books api url', function() {

    $response = $this->get('/api/external-books');

    $response->assertStatus(200);

});
