<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Member::orderBy('id','DESC')->get();
        $response = [
            'message' => 'List transaction order by time',
            'data' =>   $transaction
        ];

        return response()->json($response, Response::HTTP_OK);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'job' => ['required'],
            'email' => ['required', 'email']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaction = Member::create($request->all());
            $response = [
                'message' => 'Transaction Done!',
                'data' =>   $transaction
            ];

            return response()->json($response, Response::HTTP_CREATED);
            } catch (QueryException $e) {
                return response()->json([
                    'message' => "Failed" . $e->errorInfo
                ]);
     }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Member::findOrFail($id);
        $response = [
            'message' => 'Detail of transaction resource!',
            'data' =>   $transaction
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Member::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'job' => ['required'],
            'email' => ['required', 'email']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaction->update($request->all());
            $response = [
                'message' => 'Transaction Update Done!',
                'data' =>   $transaction
            ];

            return response()->json($response, Response::HTTP_OK);

            } catch (QueryException $e) {
                return response()->json([
                    'message' => "Failed" . $e->errorInfo
                ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Member::findOrFail($id);

        try {
            $transaction->delete();
            $response = [
                'message' => 'Transaction Deleted Done!',
            ];

            return response()->json($response, Response::HTTP_OK);

            } catch (QueryException $e) {
                return response()->json([
                    'message' => "Failed" . $e->errorInfo
                ]);
          }
    }
}
