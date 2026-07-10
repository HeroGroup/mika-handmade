<?php

class Helpers {
  public static function unlink(string $path): void {
    if (file_exists($path)) {
      unlink($path);
    }
  }
}
