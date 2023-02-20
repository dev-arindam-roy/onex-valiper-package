<?php
  
namespace Onex\Valiper\Valiper;

use Illuminate\Support\Facades\Validator;
  
class ValiperClass 
{      
    /**
     * heyValiper
     *
     * @return void
     */
    public function heyValiper()
    {
        return "OK";
    }
    
    /**
     * checkInputValidation
     *
     * @param  array $formData
     * @param  array $rules
     * @param  array $messages
     * @return void
     */
    public function checkInputValidation($formData, $rules, $messages)
    {
        if (empty($formData) && !is_array($formData)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Form data or request data is the first parameter and it should be require in array format.'
            ];
        }

        if (empty($rules) && !is_array($rules)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Validation rules is the second parameter and it should be require in array format.'
            ];
        }

        if (empty($messages) && !is_array($messages)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Validation messages is the third parameter and it should be require in array format.'
            ];
        }

        $errorDetails = [];
        $errorDetails['onexvaliper_status'] = 'success';
        $errorDetails['is_validation_pass'] = true;
        $validation = Validator::make($formData, $rules, $messages);
        if ($validation->fails()) {
            $errorMessagesList = [];
            $errorMessagesCommaList = [];
            $validationErrors = $validation->errors();
            $validationErrorsArr = $validationErrors->toArray();
            $validationErrorsJson = $validationErrors->toJson();
            $validationErrorsFirst = $validationErrors->first();
            $validationErrorsGet = $validationErrors->get('*');
            $validationErrorsAll = $validationErrors->all();
            foreach($validationErrorsArr as $errorKey => $errors) {
                $errorMessagesCommaList[$errorKey] = implode(',', $errors);
                foreach($errors as $errMsgs) {
                    array_push($errorMessagesList, $errMsgs);
                }
            }
            $errorDetails['onexvaliper_status'] = 'error';
            $errorDetails['is_validation_pass'] = false;
            $errorDetails['error_object_details'] = $validationErrors;
            $errorDetails['error_json_details'] = $validationErrorsJson;
            $errorDetails['error_message_first'] = $validationErrorsFirst;
            $errorDetails['error_get_details'] = $validationErrorsGet;
            $errorDetails['error_all_details'] = $validationErrorsAll;
            $errorDetails['error_messages_list'] = $errorMessagesList;
            $errorDetails['error_messages_key_value_array_list'] = $validationErrorsArr;
            $errorDetails['error_messages_key_value_pair_list'] = $errorMessagesCommaList;
        }
        return $errorDetails;
    }
    
    /**
     * inputValidationObjectFormat
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationObjectFormat($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return !empty($errorDetails['error_object_details']) ? $errorDetails['error_object_details'] : [];
    }
    
    /**
     * inputValidationArrayFormat
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationArrayFormat($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return !empty($errorDetails['error_messages_key_value_array_list']) ? $errorDetails['error_messages_key_value_array_list'] : [];
    }
    
    /**
     * inputValidationJsonResponseFormat
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationJsonResponseFormat($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return response()->json(!empty($errorDetails['error_messages_key_value_array_list']) ? $errorDetails['error_messages_key_value_array_list'] : [])->getData();
    }
    
    /**
     * inputValidationJsonFormat
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationJsonFormat($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return json_encode(!empty($errorDetails['error_messages_key_value_array_list']) ? $errorDetails['error_messages_key_value_array_list'] : []);
    }
    
    /**
     * inputValidationJsonObjectFormat
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationJsonObjectFormat($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return json_encode(!empty($errorDetails['error_messages_key_value_array_list']) ? $errorDetails['error_messages_key_value_array_list'] : [], JSON_FORCE_OBJECT);
    }
    
    /**
     * inputValidationKeyValuePairFormat
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationKeyValuePairFormat($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return !empty($errorDetails['error_messages_key_value_pair_list']) ? $errorDetails['error_messages_key_value_pair_list'] : [];
    }
    
    /**
     * inputValidationFirstMessage
     *
     * @param  array $errorDetails
     * @return void
     */
    public function inputValidationFirstMessage($errorDetails)
    {
        if (empty($errorDetails) && !is_array($errorDetails)) {
            return [
                'onexvaliper_status' => 'error',
                'onexvaliper_error_message' => 'Please pass checkInputValidation response as parameter.'
            ];
        }

        return !empty($errorDetails['error_message_first']) ? $errorDetails['error_message_first'] : '';
    }
}