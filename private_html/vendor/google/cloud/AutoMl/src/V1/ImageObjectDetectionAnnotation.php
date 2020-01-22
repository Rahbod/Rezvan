<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1/detection.proto

namespace Google\Cloud\AutoMl\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Annotation details for image object detection.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1.ImageObjectDetectionAnnotation</code>
 */
class ImageObjectDetectionAnnotation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The rectangle representing the object location.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1.BoundingPoly bounding_box = 1;</code>
     */
    private $bounding_box = null;
    /**
     * Output only. The confidence that this annotation is positive for the parent
     * example, value in [0, 1], higher means higher positivity confidence.
     *
     * Generated from protobuf field <code>float score = 2;</code>
     */
    private $score = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AutoMl\V1\BoundingPoly $bounding_box
     *           Output only. The rectangle representing the object location.
     *     @type float $score
     *           Output only. The confidence that this annotation is positive for the parent
     *           example, value in [0, 1], higher means higher positivity confidence.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1\Detection::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The rectangle representing the object location.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1.BoundingPoly bounding_box = 1;</code>
     * @return \Google\Cloud\AutoMl\V1\BoundingPoly
     */
    public function getBoundingBox()
    {
        return $this->bounding_box;
    }

    /**
     * Output only. The rectangle representing the object location.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1.BoundingPoly bounding_box = 1;</code>
     * @param \Google\Cloud\AutoMl\V1\BoundingPoly $var
     * @return $this
     */
    public function setBoundingBox($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1\BoundingPoly::class);
        $this->bounding_box = $var;

        return $this;
    }

    /**
     * Output only. The confidence that this annotation is positive for the parent
     * example, value in [0, 1], higher means higher positivity confidence.
     *
     * Generated from protobuf field <code>float score = 2;</code>
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Output only. The confidence that this annotation is positive for the parent
     * example, value in [0, 1], higher means higher positivity confidence.
     *
     * Generated from protobuf field <code>float score = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setScore($var)
    {
        GPBUtil::checkFloat($var);
        $this->score = $var;

        return $this;
    }

}

