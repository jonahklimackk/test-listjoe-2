<?php

namespace App\Http\Controllers;

use App\Calf\MailingList;
use Illuminate\Http\Request;

class TestMoosendMailingListController extends Controller
{
	/**
	* Test creating a mailing list
	*
	* @return int
	*/
	public static function create()
	{
		//returns ID of newly created mailing list
		//error if duplicate name

		return MailingList::create(Str::rand(12);
	}

	/**
	* Test deleting a mailing list
	*
	* @return int
	*/
	public static function delete()
	{
		$result = MailingList::delete('testfcn4');
		dump($result);
		return;
	}

	/**
	* Test getting a mailing list using name or id
	*
	* @return int
	*/
	public static function get()
	{
		$mailingList = MailingList::get('test');
		dump($mailingList);

		$mailingList = MailingList::get($mailingList->ID);
		dump($mailingList);

		return;
	}




	/**
	* Test getting all mailing lists
	*
	* @return int
	*/
	public static function getAll()
	{
		$mailingLists = MailingList::getAll();
		dd($mailingLists);
	}

}
