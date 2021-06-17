<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
  public function index()
  {
    // $contacts = Contact::all();
    $contacts = Contact::paginate(8);
    return view('contacts.index', compact('contacts'));
  }

  public function create()
  {
      return view('contacts.create');
  }

  public function store(Request $request)
  {
      $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
      ]);
      $contact = new Contact();
      $contact->name = $request->name;
      $contact->company = $request->company;
      $contact->phone = $request->phone;
      $contact->email = $request->email;

      $contact->save();
      return redirect('/')->with('success','Contact created successfully!');
  }

  public function show(Contact $contact)
  {
      return view('contacts.show', compact('contact'));
  }

  public function edit(Contact $contact)
  {
      return view('contacts.edit', compact('contact'));
  }

  public function update(Contact $contact, Request $request)
  {
      $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
      ]);
      $contact->name = $request->name;
      $contact->company = $request->company;
      $contact->phone = $request->phone;
      $contact->email = $request->email;

      $contact->save();
      return redirect('/')->with('success','Contact updated successfully!');
  }

  public function destroy(Contact $contact)
  {
      $contact->delete();
      return redirect('/')->with('success','Contact deleted successfully!');
  }
}