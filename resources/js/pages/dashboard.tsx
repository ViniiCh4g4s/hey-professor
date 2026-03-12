import { Form, Head } from '@inertiajs/react';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Field, FieldLabel } from '@/components/ui/field';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import questions from '@/routes/questions';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard.url(),
    },
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <Form
                    {...questions.store.form()}
                    className="mx-auto w-full max-w-5xl"
                >
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
            </div>
        </AppLayout>
    );
}
