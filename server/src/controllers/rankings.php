<?php declare (strict_types = 1);

class RankingsController extends GuardController
{
    public function rest(): void
    {
        $rankings = Stats::top();

        $this->json(200, [
            'rankings' => $rankings,
            'rank' => Stats::byId(intval($this->user['user_id'])),
        ]);
    }

    public function paginated_rest(string $page): void
    {
        $rankings = Stats::paginated(intval($page));

        $this->json(200, [
            'rankings' => $rankings,
        ]);
    }
}
