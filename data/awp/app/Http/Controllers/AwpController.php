<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class AwpController extends Controller
{
  public function index(Request $request)
  {
    $preview = $this->getPreview('template.txt', $request->all());
    $view = view('awp')->with('preview', $preview);
    $view->with('input', $this->initInput($request->all()));
    return $view;
  }

  private function initInput(Array $input)
  {
    $input['no'] = isset($input['no']) ? $input['no'] : '0';
    $input['title'] = isset($input['title']) ? $input['title'] : 'no title';
    $input['text'] = isset($input['text']) ? $input['text'] : 'no text';
    return $input;
  }

  private function getPreview($templateFile, Array $request)
  {
    $preview = Storage::get($templateFile);
    $params = $this->initInput($request);
    $preview = str_replace($this->createReplaceString('no'), $params['no'], $preview);
    $preview = str_replace($this->createReplaceString('title'), $params['title'], $preview);
    $preview = str_replace($this->createReplaceString('text'), $params['text'], $preview);

    return $preview;
  }

  private function createReplaceString($key)
  {
    if (is_string($key) === false)
    {
      throw new \InvalidArgumentException('argument is string');
    }
    return '${' . $key . '}';
  }
}
