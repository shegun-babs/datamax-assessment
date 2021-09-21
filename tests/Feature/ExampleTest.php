<?php


it('redirects to /books ')->get('/')->assertStatus(302);

it('has books page')->get('/books')->assertStatus(200);
