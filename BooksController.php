<?php
use App\Book;
use App\Http\Controllers\Api\Controller;

/**
 * Created by PhpStorm.
 * User: bradley_peexoo
 * Date: 10/02/2020
 * Time: 4:55 PM
 */




class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth","api"]);
    }

    public function index(){
        $books = Book::all();
        return $this->sendResponse($books,"Loaded successfully","books");
    }
}