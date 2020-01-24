<?php
class Song
{
  private $con;
  private $id;
  private $mysqliData;
  private $title;
  private $artistId;
  private $albumId;
  private $genre;
  private $duration;
  private $path;

  public function __construct($con, $id)
  {
    $this->con = $con;
    $this->id = $id;

    $query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
    $this->mysqliData = mysqli_fetch_array($query);
    $this->title = $this->mysqliData['title'];
    $this->title = $this->mysqliData['artist'];
    $this->title = $this->mysqliData['album'];
    $this->title = $this->mysqliData['genre'];
    $this->title = $this->mysqliData['duration'];
    $this->title = $this->mysqliData['path'];
  }

  public function getTitle()
  {
    return $this->title;
  }
  public function getArtist()
  {
    return new Artist($this->con, $this->artistId);
  }
  public function getAlbum()
  {
    return new Album($this->con, $this->albumId);
  }
  public function getGenre()
  {
    return $this->genre;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function getMysqliData()
  {
    return $this->mysqliData;
  }
}
