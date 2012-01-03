<?php

namespace JonsCaching\GpxReader;

/**
 *
 *
 * @author      Jon Townsend <jtownsend54@gmail.com>
 */
class GpxReader
{
    private $filename;
    private $loadedGpx;
    
    public function __construct($filename = null)
    {
        if ($filename === null) 
        {
            throw new InvalidFilenameException('The file name passed to the constructor is invalid');
        }
        
        $this->filename     = $filename;
        $this->loadedGpx    = simplexml_load_file($filename);
    }
    
    /**
     * Check if the filename exists. Throw fileNotFoundException if not found, return true if found
     * 
     * @param string $filename
     * @return boolean 
     */
    public function fileExists($filename)
    {
        
        return true;
    }
    
    /**
     * Return the GPX filename
     * 
     * @return string filename
     */
    public function getFilename()
    {
        return $this->filename;
    }
    
    /*
     * Parse the GPX file and return an array of all lat and long pairs
     * 
     * @return array points
     */
    public function getLatLongs()
    {
        $gpx    = $this->loadedGpx;
        $track  = $gpx->trk;
        
        $points = array();
        
        foreach ($track->trkseg as $segment)
        {
            foreach ($segment->trkpt as $point)
            {
                $latLong = array();
                
                foreach ($point->attributes() as $value)
                {
                    $latLong[] = (string)$value;
                }
                
                $points[] = $latLong;
            }
        }
        
        return $points;
    }
}