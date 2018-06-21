<?php

namespace App\Jobs\Webhooks\AmoCRM;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Repositories\Contracts\LeadRepository;

class AddLeads implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $leads;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $leads)
    {
        $this->leads = $leads;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(LeadRepository $leadRepository)
    {
        $processedLeads = array_map(function($lead) {
            return [
                'amocrm_id' => $lead['id'],
                'name' => $name = $lead['name'],
                'hash_name' => $this->hashLeadName($name)
            ];
        }, $this->leads);

        $leadRepository->storeMultiple($processedLeads);
    }

    protected function hashLeadName(string $leadName)
    {
        sleep(1);
        return sha1($leadName);
    }
}
