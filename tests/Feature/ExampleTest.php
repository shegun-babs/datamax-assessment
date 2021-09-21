<?php

it('redirects / away')->get('/')->assertStatus(302);

it('has books page')->get('/books')->assertStatus(200);
