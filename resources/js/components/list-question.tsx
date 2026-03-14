import { ThumbsUp, ThumbsDown } from 'lucide-react';
import Form from '@/components/form';
import { Button } from '@/components/ui/button';
import { Card, CardContent } from '@/components/ui/card';
import questions from '@/routes/questions';

interface Question {
    id: number;
    question: string;
    likes_count: number;
    dislikes_count: number;
}

export default function ListQuestion({ item }: { item: Question }) {
    return (
        <Card>
            <CardContent className="flex items-center justify-between gap-4">
                <p className="flex-1">{item.question}</p>

                <div className="flex items-center gap-2">
                    <Form action={questions.vote.url(item.id)} post>
                        <input type="hidden" name="vote" value="upvote" />
                        <Button type="submit" variant="ghost" size="lg" className="gap-1 text-green-600 hover:text-green-700 hover:bg-green-50">
                            <ThumbsUp className="h-4 w-4" />
                            <span>{item.likes_count}</span>
                        </Button>
                    </Form>

                    <Form action={questions.vote.url(item.id)} post>
                        <input type="hidden" name="vote" value="downvote" />
                        <Button type="submit" variant="ghost" size="lg" className="gap-1 text-red-600 hover:text-red-700 hover:bg-red-50">
                            <ThumbsDown className="h-4 w-4" />
                            <span>{item.dislikes_count}</span>
                        </Button>
                    </Form>
                </div>
            </CardContent>
        </Card>
    );
}
