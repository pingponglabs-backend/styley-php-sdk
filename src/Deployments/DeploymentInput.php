<?php

namespace Styley\Deployments;

use \Styley\HttpClient\Mappable;


class DeploymentInput implements Mappable
{
    public function __construct(
        public string $name,
        public string $model_id,
        public array $args,
        public string $output_format,
        public string $output_width,
        public string $output_height,
    ) {}

    public function toMap(): array
    {
        return [
            'name' => $this->name,
            'model_id' => $this->model_id,
            'args' => $this->args,
            'output_format' => $this->output_format,
            'output_width' => $this->output_width,
            'output_height' => $this->output_height,
        ];
    }
}
