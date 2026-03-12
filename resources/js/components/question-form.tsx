import Form from '@/components/form';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Field, FieldLabel } from '@/components/ui/field';
import { Textarea } from '@/components/ui/textarea';
import questions from '@/routes/questions';

export default function QuestionForm() {
    return (
        <Form action={questions.store.url()} className="mx-auto w-full max-w-5xl">
            {({ errors }) => (
                <>
                    <Field>
                        <FieldLabel htmlFor="question">
                            Question
                        </FieldLabel>
                        <Textarea
                            id="question"
                            name="question"
                            rows={4}
                            placeholder="Ask me anything..."
                        />
                        <InputError message={errors.question} />
                    </Field>
                    <Button type="submit" className="mt-4">
                        Send
                    </Button>
                    <Button type="reset" className="mt-4 ms-2" variant="outline">
                        Cancel
                    </Button>
                </>
            )}
        </Form>
    );
}
