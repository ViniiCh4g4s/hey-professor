import { Head } from '@inertiajs/react';
import Container from '@/components/container';
import ListQuestion from '@/components/list-question';
import QuestionForm from '@/components/question-form';
import { Separator } from '@/components/ui/separator';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard.url(),
    },
];

export default function Dashboard({ questions }: { questions: any }) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <Container>
                <QuestionForm />
                <Separator className="my-4" />
                <h2>List of Questions</h2>
                <div className="flex flex-col gap-2 space-y-2">
                    {questions.map((item: any) => (
                        <ListQuestion key={item.id} item={item} />
                    ))}
                </div>
                {/*<div className="grid auto-rows-min gap-4 md:grid-cols-3">*/}
                {/*    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">*/}
                {/*        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />*/}
                {/*    </div>*/}
                {/*    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">*/}
                {/*        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />*/}
                {/*    </div>*/}
                {/*    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">*/}
                {/*        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />*/}
                {/*    </div>*/}
                {/*</div>*/}
                {/*<div className="relative min-h-screen flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">*/}
                {/*    <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />*/}
                {/*</div>*/}
            </Container>
        </AppLayout>
    );
}
