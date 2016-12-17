<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'school' => array(
            'schoolname' => array(
                'required' => 'your name is required.',
                'min'      => 'name must be above :number characters.',
                'max'      => 'name must not exceed :number characters.',
                'regex'    =>  'your input is not valid.'), 
            'email' => array(
                'required' =>  'your email is required.',
                'email'    =>  'invalid email.',
                'max'      =>  'email must not exceed :number characters.',
                'unique'   =>  'this email already exists.'),
            'address' => array(
                'required'   => 'your address is required.',
                'min'        => 'invalid address.',
                'max'        => 'address must not exceed 255 characters.'),
            'website' => array(
               'required'    => 'your website is required.'),
            'phone' => array(
               'required'=>  'your phone number is required.'),
            'contactname' => array(
                'required'  => 'your contact name is required.',
                'min'       => 'contact name must be above :number characters.',
                'max'       => 'contact name must not exceed :number characters.',
                'regex'     => 'your input is not valid.'),
            'contactphone' => array(
                'required'  =>  'your contact phone number is required.'),
            'password' => array(
                'required'  =>  'A password is required.',
                'min'       =>  'password must be above :number characters.',
                'max'       =>  'password must not exceed :number characters.'),
            'logo' => array(
                'required'  => 'your logo is required')
            ),
        'parent' => array(
            'parentName' =>array(
                     'required'=>'your name is required.',
                     'min'=>     'name must be above :number characters.',
                     'max'=>     'name must not exceed :number characters.',
                        'regex'=>   'your input is not valid.'),
            'address' => array(
                        'required'  => 'your address is required.',
                        'min'       => 'invalid address.',
                        'max'       => 'address must not exceed :number characters.'),
            'phone' => array(
                        'required'=>  'your phone number is required.'),
            'email' => array(
                        'required'=>  'your email is required.',
                        'email'=>     'invalid email.',
                        'max'=>       'email must not exceed :number characters.',
                        'unique'=>    'this email already exists.'),
            'password' => array(

                        'required'=>  'A password is required.',
                        'min'=>       'password must be above :number characters.',
                        'max'=>       'password must not exceed :number characters.'),
            'facebookid' => array(                       
                        'required' => 'Please,your facebookURL is required'),
            'skypeid' => array(
                        'required' => 'Please, your skypeid is required'),
            'birthdate' => array(
                        'required' => 'Please,your date of birth is required'),
            'schoolname' => array(
                        'required' => 'Please, choose school.')
                            ),
        'diaries' => array(
            'diaryDateTime' => array(
                'required' => 'Please,Diary Date is required'),
            'detail' => array(
                        'required'=>  'Details are are required.'),
            'notice'  => array(
                        'required'=>  'Notice is required.'),
            'image' => array(
                        'required ' => 'An imgae is required', 
                        'mimes' => 'invalid image file. Please upload image formats',
                        'max' => 'The image size must not exceed :number MB.')
            ),
        'health' => array(
            'examinedate' => array(
                            'required'=>  'Examinedate is required.'),
            'height' => array(
                        'required'=>  'baby\'s height is required.'),
            'weight' => array(
                        'required'=>  'baby\'s weight is required.'),
            'note' => array(
                        'required'  =>  'A note is required.')
                       ),
        'teacher' => array(

             'teacherName' =>array(
                        'required'=>'your name is required.',
                        'min'=>     'name must be above :number characters.',
                        'max'=>     'name must not exceed :number characters.',
                        'regex'=>   'your input is not valid.'),
             'address' => array(
                        'required'=>  'your address is required.',
                        'min'=>     'invalid address.',
                        'max'=>       'address must not exceed :number characters.'),
             'email' => array(                       
                        'required'=>  'your email is required.',
                        'email'=>     'invalid email.',
                        'max'=>       'email must not exceed :number characters.',
                        'unique'=>    'this email already exists.'),
             'password' => array(
                        'required'=>  'A password is required.',
                        'min'=>       'password must be above :number characters.',
                        'max'=>       'password must not exceed :number characters.'),
             'birthdate' => array(
                        'required' => 'your birthdate is required.'),
             'facebookid' => array(
                        'required' => 'Please,your facebookURL is required'),
             'skypeid' => array(
                        'required' => 'Please, your skypeid is required'),
             'classname' => array(
                        'required' => 'Please, choose class'),
             'publicinformation' => array( 
                        'required' => 'Please, enter public information.')

            )
    ],
      

       

        

        
    
       
                           

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
