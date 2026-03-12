import React from 'react';
import { Card, CardContent } from '@/components/ui/card';

export default function ListQuestion(props: { item: any }) {
    return (
        <Card>
            <CardContent>{props.item.question}</CardContent>
        </Card>
    );
}
