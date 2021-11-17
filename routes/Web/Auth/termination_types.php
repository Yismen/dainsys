<?php

Route::resource('termination_types', 'TerminationTypeController')->except(['destroy']);
