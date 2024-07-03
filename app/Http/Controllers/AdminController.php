<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;
use App\Models\Admin;
use App\Models\FormValues;
use Session;
use Mail;


class AdminController extends Controller
{
    public function dashboard() {
        $forms = Forms::get();
        return view('admin-dashboard', compact('forms'));
    }

    public function addForm(Request $request) {
        $formElements = collect(NULL);
        for ($i=1; $i < $request->field_count; $i++) {
            $fieldName = 'field_name_'.$i;
            $fieldType = 'field_type_'.$i;
            $fieldObj = (object)NULL;
            $fieldObj->fieldName = $request->$fieldName;
            $fieldObj->fieldType = $request->$fieldType;
            $formElements->push($fieldObj);
        }
        $form = new Forms;
        $form->form_name = $request->form_name;
        $form->form_elements = serialize($formElements);
        $form->save();

        // mail code start
            /*
            $data=$request->input();
            $data['title']="New Form Added";
            $data['name'] = "New Form Added";
            Mail::send('mail', $data, function($message)use($data) {
                $message->to('ajmalpadalathkkv@gmail.com', 'ajmalpadalathkkv@gmail.com')
                        ->subject($data["title"]);
            
                
            });
            if (Mail::failures()) {
                return response()->json(['status'=>0]);
                
            }
            else{
                return response()->json(['status'=>1]);
            }
                */
        // mail code end
    }

    public function userDashboard(Request $request) {
        $forms = Forms::get();
        return view('user-dashboard', compact('forms'));
    }

    public function commonFormElementList(Request $request) {
        $formId = $request->formId;
        $formData = Forms::find($formId);
        $formData->formElements = unserialize($formData->form_elements);
        return view('common-form-element-list', compact('formData'));
    }

    public function checkLogIn(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $admin = Admin::where('email', $email)->where('password', $password)->first();
        if($admin) {
            session()->put('userRole', 'admin');
            session()->save();
            $status = 1;
            $messge = 'success';
        } else {
            $status = 2;
            $messge = 'Please check email and password';

        }
        return response()->json(['status' => $status, 'messge' => $messge]);
    }

    public function commonFormSubmit(Request $request) {
        $formValues = new FormValues;
        $formValues->form_id = $request->formId;
        $formValues->form_values = $request->formId;
        $formValuesCollection = collect(NULL);
        for ($i=0; $i < $request->field_count; $i++) {
            $fieldValues = 'elemnt_'.$i;
            $fieldObj = (object)NULL;
            $fieldObj->fieldValues = $request->$fieldValues;
            $formValuesCollection->push($fieldObj);
        }
        $formValues = new FormValues;
        $formValues->form_id = $request->formId;
        $formValues->form_values = serialize($formValuesCollection);
        $formValues->save();
    }

    public function deleteForm(Request $request) {
        Forms::where('id', $request->formId)->delete();
    }

    public function editForm(Request $request) {
        $formId = $request->formId;
        $formData = Forms::find($formId);
        $formData->formElements = unserialize($formData->form_elements);
        return view('edit-form', compact('formData'));
    }

}
